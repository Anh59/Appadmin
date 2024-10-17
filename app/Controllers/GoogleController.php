<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Google\Client as GoogleClient;
class GoogleController extends BaseController
{
    public function index()
    {
        //
    }
    private $googleClient;

    public function __construct()
    {
        $this->googleClient = new GoogleClient();
        $this->googleClient->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->googleClient->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->googleClient->setRedirectUri(base_url('api_Customers/google_callback'));
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function googleLogin()
    {
        $authUrl = $this->googleClient->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function googleCallback()
    {
        if ($this->request->getVar('code')) {
            $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
            $this->googleClient->setAccessToken($token['access_token']);

            // Get user info from Google
            $googleService = new \Google\Service\Oauth2($this->googleClient);
            $googleUser = $googleService->userinfo->get();

            $email = $googleUser->email;
            $name = $googleUser->name;
            
            // Check if the user already exists
            $customerModel = new CustomerModel();
            $customer = $customerModel->where('email', $email)->first();

            if ($customer) {
                // Log the user in
                session()->set('customer_id', $customer['id']);
                return redirect()->to(base_url('/'))->with('message', 'Logged in with Google successfully');
            } else {
                // Register the user if they don't exist
                $customerModel->save([
                    'name' => $name,
                    'email' => $email,
                    'is_verified' => true, // Auto-verify Google users
                ]);

                // Log the user in
                session()->set('customer_id', $customerModel->insertID());
                return redirect()->to(base_url('/'))->with('message', 'Account created and logged in with Google successfully');
            }
        } else {
            return redirect()->to(base_url('api_Customers/customers_sign'))->with('error', 'Login with Google failed');
        }
    }
}
