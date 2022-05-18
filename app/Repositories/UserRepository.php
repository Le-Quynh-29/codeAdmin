<?php
namespace App\Repositories;
use App\Models\User;
use App\Repositories\Support\AbstractRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository extends AbstractRepository
{
    public function model()
    {
        return 'App\Models\User';
    }

    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    /**
     * Create user
     *@param array $data
     *@return mixed
     */
    public function createUser(array $data)
    {
        $username = !is_null($data['username']) ? $data['username'] : Str::random(15);
        $birthday = !is_null($data['birthday']) ? Carbon::createFromFormat('d/m/Y', $data['birthday'])->format('Y-m-d') : null;
        $user = User::create([
            'name' => $data['name'],
            'username' => $username,
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'birthday' => $birthday,
            'role' => $data['role'],
            'status' => $data['status'],
            'password' => Hash::make($data['password'])
        ]);
        return $user;
    }

    /**
     * Create user
     *@param int $id
     *@param array $data
     *@return mixed
     */
    public function editUser($id, array $data)
    {
        $username = !is_null($data['username']) ? $data['username'] : Str::random(15);
        $birthday = !is_null($data['birthday']) ? Carbon::createFromFormat('d/m/Y', $data['birthday'])->format('Y-m-d') : null;
        $user = User::where('id', $id)->update([
            'name' => $data['name'],
            'username' => $username,
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'birthday' => $birthday,
            'role' => $data['role'],
            'status' => $data['status'],
        ]);

        if (!is_null($data['password'])) {
            $user = User::where('id', $id)->update([
                'password' => Hash::make($data['password'])
            ]);
        }
        return $user;
    }

    /**
     * Check validate unique name
     *
     * @param mixed $id
     * @param mixed $name
     * @return void
     */
    public function validateUniqueName($id, $name)
    {
        $data = User::where('username', $name);

        if (!is_null($id)) {
            $data = $data->where('id', '<>', $id);
        }
        $data = $data->get();

        if (sizeof($data) == 0) {
            return true;
        }
        return false;
    }

    /**
     * Check validate unique email
     *
     * @param mixed $id
     * @param mixed $email
     * @return void
     */
    public function validateUniqueEmail($id, $email)
    {
        $data = User::where('email', $email);

        if (!is_null($id)) {
            $data = $data->where('id', '<>', $id);
        }
        $data = $data->get();

        if (sizeof($data) == 0) {
            return true;
        }
        return false;
    }

    /**
     * Check validate unique phone number
     *
     * @param mixed $id
     * @param mixed $phoneNumber
     * @return void
     */
    public function validateUniquePhoneNumber($id, $phoneNumber)
    {
        $data = User::where('phone_number', $phoneNumber);

        if (!is_null($id)) {
            $data = $data->where('id', '<>', $id);
        }
        $data = $data->get();

        if (sizeof($data) == 0) {
            return true;
        }
        return false;
    }
}
