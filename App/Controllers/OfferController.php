<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\IAuthenticator;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Offer;
use App\Models\Review;

class OfferController extends AControllerBase
{
    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        return $this->html(
            [
                'offers' => Offer::getAll()
            ]
        );
    }

    public function add(): Response
    {
        return $this->html();
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $offer = Offer::getOne($id);

        if (is_null($offer)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'offer' => $offer
            ]
        );
    }

    public function save()
    {
        $edit = false;
        $id = (int)$this->request()->getValue('id');
        $oldFileName = "";

        if ($id > 0) {
            $edit = true;
            $offer = Offer::getOne($id);
            $oldFileName = $offer->getPicture();
        } else {
            $offer = new Offer();
        }
        $offer->setName($this->request()->getValue('name'));
        //$offer->setPicture($this->request()->getFiles()['picture']['name']);
        $offer->setLocation($this->request()->getValue('location'));
        $offer->setContact($this->request()->getValue('contact'));
        $offer->setPrice($this->request()->getValue('price'));
        $offer->setAuthorID($this->app->getAuth()->getLoggedUserId());

        if ($edit) {
            $formErrors = $this->formErrors(true);
        } else {
            $formErrors = $this->formErrors(false);
        }
        if (count($formErrors) > 0) {
            if ($oldFileName != "") {
                return $this->html(
                    [
                        'offer' => $offer,
                        'errors' => $formErrors
                    ], 'edit'
                );
            } else {
                return $this->html(
                    [
                        'offer' => $offer,
                        'errors' => $formErrors
                    ], 'add'
                );
            }
        } else {
            if ($this->request()->getFiles()['picture']['name'] != "") {
                if ($oldFileName != "") {
                    FileStorage::deleteFile($oldFileName);
                }
                $newFileName = FileStorage::saveFile($this->request()->getFiles()['picture']);
                $offer->setPicture($newFileName);
            }
            $offer->save();
            return new RedirectResponse($this->url("offer.index"));
        }
    }

    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $offer = Offer::getOne($id);

        if (is_null($offer)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($offer->getPicture());
            $reviews = Review::getAll();
            foreach ($reviews as $review) {
                if ($review->getOfferID() == $offer->getId()) {
                    $review->delete();
                }
            }

            $offer->delete();
            return new RedirectResponse($this->url("offer.index"));
        }
    }

    private function formErrors($edit): array
    {
        $errors = [];
        if ($this->request()->getFiles()['picture']['name'] == "" && $edit == false) {
            $errors[] = "Pole Vložiť súbor obrázka musí byť vyplnené!";
        }
        if ($this->request()->getValue('name') == "") {
            $errors[] = "Pole Názov ubytovania musí byť vyplnené!";
        }
        if ($this->request()->getValue('location') == "") {
            $errors[] = "Pole Poloha ubytovania musí byť vyplnené!";
        }
        if ($this->request()->getValue('price') == "") {
            $errors[] = "Pole Cena ubytovania musí byť vyplnené!";
        }
        if ($this->request()->getFiles()['picture']['name'] != "" && !in_array($this->request()->getFiles()['picture']['type'], ['image/jpeg', 'image/png'])) {
            $errors[] = "Obrázok musí byť typu JPG alebo PNG!";
        }
        return $errors;
    }
}