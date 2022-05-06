<?php
namespace App\Http\Handlers\User;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreUserHandler extends BaseHandler
{

    /**
     * @param StoreUserRequest $request
     * @param User|null $user
     * @return User|null
     */
    public function process(StoreUserRequest $request, User $user = null): ?User
    {
        try {

            if (!$user)
            {
                $user = new User();
            }

            $user->fill($request->all());

            if ($password = $request->input('password'))
            {
                $user->password = Hash::make($password);
            }

            if (!$user->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            return $user;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
