## How to install

- First select branch sanjoy and Clone the repository or download zip file.
- Run composer install.
- Run npm install
- Copy .env.example file to .env and edit database credentials there.
- Run php artisan key:generate.
- Run php artisan migrate --seed (it has some seeded data for your testing).
- Run php artisan serve.
- That's it: launch the main URL.
- You can login to with base_url/login these credentials email: test@test.com, password: password.


## Issue/Task completed in details

- Login problem fixed.(Login page "@csrf" keyword is added, email input field name="name"->"email" and password input field name="passward"->"password" is changed.)

- After register redirect to login page though RegisterController has "protected $redirectTo = '/home';". Issued fixed into "RegistersUsers" trait register() method.
Where "$this->guard()->login($user);" is commented. So commenting out is fixed the issue.

- User restriction in login like if some user enter wrong credentials for 3 time s/he needs to wait 10 min to login.

- After login user activate own account with stripe payment and success message with expired date.

- After expired activation user will automatically deactivate. This is done with "Task Scheduling".

- Monthly payment report done. Every authenticated user can see their own monthly payment report.


