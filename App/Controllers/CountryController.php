<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Country;

class CountryController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $continent = $this->request()->getValue('continent');
        $countries = array();
        foreach (Country::getAll() as $country) {
            if ($country->getContinent() == $continent) {
                $countries[] = $country;
            }
        }
        return $this->html(
            [
                'countries' => $countries,
                'continent' => $continent
            ]
        );
    }

    public function add(): Response
    {
        $continent = $this->request()->getValue('continent');
        return $this->html(
            [
                'continent' => $continent
            ]
        );
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $country = Country::getOne($id);

        if (is_null($country)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'country' => $country
            ]
        );
    }

    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $country = Country::getOne($id);
        $continent = $country->getContinent();

        if (is_null($country)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($country->getFlag());

            $country->delete();
            return new RedirectResponse($this->url("country.index", ['continent' => $continent]));
        }
    }

    public function save()
    {
        $edit = false;
        $id = (int)$this->request()->getValue('id');
        $oldFileName = "";

        if ($id > 0) {
            $edit = true;
            $country = Country::getOne($id);
            $oldFileName = $country->getFlag();
        } else {
            $country = new Country();
        }
        $country->setName($this->request()->getValue('name'));
        //$offer->setPicture($this->request()->getFiles()['picture']['name']);
        $country->setCapitalCity($this->request()->getValue('capital_city'));
        $country->setPopulation($this->request()->getValue('population'));
        $country->setArea($this->request()->getValue('area'));
        $country->setContinent($this->request()->getValue('continent'));

        if ($edit) {
            $formErrors = $this->formErrors(true);
        } else {
            $formErrors = $this->formErrors(false);
        }
        if (count($formErrors) > 0) {
            if ($oldFileName != "") {
                return $this->html(
                    [
                        'country' => $country,
                        'errors' => $formErrors
                    ], 'edit'
                );
            } else {
                return $this->html(
                    [
                        'country' => $country,
                        'errors' => $formErrors
                    ], 'add'
                );
            }
        } else {
            if ($this->request()->getFiles()['flag']['name'] != "") {
                if ($oldFileName != "") {
                    FileStorage::deleteFile($oldFileName);
                }
                $newFileName = FileStorage::saveFile($this->request()->getFiles()['flag']);
                $country->setFlag($newFileName);
            }
            $country->save();
            return new RedirectResponse($this->url("country.index", ['continent' => $country->getContinent()]));
        }
    }

    private function formErrors($edit): array
    {
        $errors = [];
        if ($this->request()->getFiles()['flag']['name'] == "" && $edit == false) {
            $errors[] = "Pole Vložiť súbor obrázka musí byť vyplnené!";
        }
        if ($this->request()->getValue('name') == "") {
            $errors[] = "Pole Názov krajiny musí byť vyplnené!";
        }
        if ($this->request()->getValue('capital_city') == "") {
            $errors[] = "Pole Hlavné mesto krajiny musí byť vyplnené!";
        }
        if ($this->request()->getValue('population') == "") {
            $errors[] = "Pole Počet obyvateľov krajiny musí byť vyplnené!";
        }
        if ($this->request()->getValue('area') == "") {
            $errors[] = "Pole Rozloha krajiny musí byť vyplnené!";
        }
        if ($this->request()->getFiles()['flag']['name'] != "" && !in_array($this->request()->getFiles()['flag']['type'], ['image/jpeg', 'image/png'])) {
            $errors[] = "Obrázok musí byť typu JPG alebo PNG!";
        }
        return $errors;
    }
}