<?php
namespace App\Http\Controllers\Gates;

use App\Http\Controllers\GateController;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UsersManaged;
use App\Mail\UserRegistered;
use App\Mail\RequestToManage;
use Illuminate\Support\Facades\Mail;
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
     * register user function

     * @param array $atributes
     * @param Model $mode
     * @param bool $doFillable
     */
    public function register(array $attributes, Model $model)
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
            $attributes['verify_token'] = str_random(40);

            // create new user record
            $result = $model->create($attributes);

            // send out event other after creation stuff
            Mail::to($result)->send(new UserRegistered($result));
        }

        return [
            $passes,
            $validator->messages(),
            $result
        ];
    }

    /**
     * Function that will take attributed taht should contain the user_type along with users_managed for users that should be managed
     *
     * @param array $attributes
     * @param User $user
     * @return array
     */
    public function createUserManaged(array $attributes, User $manager)
    {
        // 1. pull the user_type from attributes
        $userType = $attributes['user_type_id'];

        // managers are type id = 2
        if ($userType == User::TYPE_MANAGER) {
            // pull the users_managed field
            $usersManaged = $attributes['users_managed'];

            foreach($usersManaged as $userManage) {
                $fields['user_id'] = $userManage;
                $fields['manager_id'] = $manager->id;
                $fields['verify_token'] = str_random(40);

                // try to insert
                list($passes, $messages, $managed) = $this->tryInsert($fields, new UsersManaged());

                if ($passes) {
                    // get user
                    $user = User::find($userManage);

                    // send out an email to user who we are setting up for this manger to make them aware of the change
                    Mail::to($user)->send(new RequestToManage($user, $manager, $managed->verify_token));
                }
            }
        }
    }
}