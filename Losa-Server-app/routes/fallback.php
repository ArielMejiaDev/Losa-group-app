<?php 

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::any('{any}', function() {
    throw new NotFoundHttpException;
})->where('any', '.*')->middleware('auth');