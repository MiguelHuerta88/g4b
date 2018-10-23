<?php
namespace App\Http\Controllers\Gates;

use App\Http\Controllers\GateController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * Created by PhpStorm.
 * User: miguelhuerta
 * Date: 10/23/18
 * Time: 5:24 AM
 */
class UserGate extends GateController
{
    /**
     * TryStore for user model
     * @param array $atributes
     * @param Model $mode
     * @param bool $doFillable
     */
    public function tryInsert(array $attributes, Model $model, $doFillable = true)
    {
        // first validate the input
        $validator = $this->insertValidator($attributes, $model->getRules());
        $passes = $validator->passes();

        // default result
        $result = null;

        if ($passes) {
            // before sending it off we need to hash the password
            $attributes['password'] = Hash::make($attributes['password']);
            // also create a verify_hash for the email message
            $attributes['verify_hash'] = str_random(40);

            // create new user record
            if ($doFillable) {
                $result = $model->create($attributes);
            } else {
                // we can mass assign or we can instantiate model and set the field and save.
                $result = $this->setUpModel($attributes, $model);
            }
        }

        return [
            $passes,
            $validator->messages(),
            $result
        ];
    }
}