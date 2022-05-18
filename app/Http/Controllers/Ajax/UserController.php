<?php

namespace App\Http\Controllers\Ajax;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends AjaxController
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Check validate unique name
     *
     * @param  mixed $request
     * @return void
     */
    public function validateUniqueName(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('username');
        $data = $this->userRepo->validateUniqueName($id, $name);
        return $this->responseSuccess($data);
    }

    /**
     * Check validate unique email
     *
     * @param  mixed $request
     * @return void
     */
    public function validateUniqueEmail(Request $request)
    {
        $id = $request->get('id');
        $email = $request->get('email');
        $data = $this->userRepo->validateUniqueEmail($id, $email);
        return $this->responseSuccess($data);
    }

    /**
     * Check validate unique phone number
     *
     * @param  mixed $request
     * @return void
     */
    public function validateUniquePhoneNumber(Request $request)
    {
        $id = $request->get('id');
        $phoneNumber = $request->get('phone_number');
        $data = $this->userRepo->validateUniquePhoneNumber($id, $phoneNumber);
        return $this->responseSuccess($data);
    }

    /**
     * User update
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        $user = $this->userRepo->find($id);
        abort_if(is_null($user), 404);
        $this->authorize('update', $user);
        $data = $request->except(['_token', '_method', '_url']);
        $this->userRepo->editUser($id, $data);
        return $this->responseSuccess('success');
    }
}
