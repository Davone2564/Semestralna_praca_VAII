<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Offer;
use App\Models\Review;

class ReviewController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $reviews = array();
        foreach (Review::getAll() as $review) {
            if ($review->getOfferID() == $id) {
                $reviews[] = $review;
            }
        }
        return $this->html(
            [
                'reviews' => $reviews,
                'name' => Offer::getOne($id)->getName(),
                'offerID' => $id
            ]
        );
    }

    public function add(): Response
    {
        $id = (int) $this->request()->getValue('offerID');
        return $this->html(
            [
                'offerID' => $id,
                'offerName' => Offer::getOne($id)->getName()
            ]
        );
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $review = Review::getOne($id);

        return $this->html(
            [
                'review' => $review,
                'offerName' => $this->request()->getValue('offerName')
            ]
        );
    }

    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $review = Review::getOne($id);
        $offerID = $review->getOfferID();

        if (is_null($review)) {
            throw new HTTPException(404);
        } else {
            $review->delete();
            return new RedirectResponse($this->url("review.index", ['id' => $offerID]));
        }
    }

    public function save(): Response
    {
        $edit = false;
        $id = (int) $this->request()->getValue('id');

        if ($id > 0) {
            $edit = true;
            $review = Review::getOne($id);
        } else {
            $review = new Review();
        }
        $review->setAuthorName($this->app->getAuth()->getLoggedUserName());
        $review->setStars((int)$this->request()->getValue('star'));
        $review->setMinuses($this->request()->getValue('minuses'));
        $review->setPluses($this->request()->getValue('pluses'));
        $review->setOfferID($this->request()->getValue('offerID'));

        $review->save();
        return new RedirectResponse($this->url("review.index", ['id' => $this->request()->getValue('offerID')]));
    }
}