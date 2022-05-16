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
        dd($data);
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
}
