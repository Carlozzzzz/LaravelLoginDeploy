## My Laravel practice app
    Create Controller -> Create Model -> Create View -> 

## Requriements


## Setup

    ** Create new laravel app
    -- laravel new LaravelPracticeApp

    ** Install tailwind
    -- npm install -D tailwindcss postcss autoprefixer
    -- npx tailwindcss init -p

    ** Go to app.css and add the following code
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    
    ** Run the npm and artisan server
        -- npm run dev
        -- php artisan serve

    ** Create migrations files
        -- php artisan make:migration create_user_table
        -- php artisan migrate

    ** Run the Seeder (Create a Factory and Setup your seeder)
        -- php artisan make:factory UserFactory (Set this up) (Initialize this on Seeder)
        -- php artisan migrate:refresh --seed

    


## Guides
    # Retrieve Data
        -- DB::table('users')->orderBy('created_at', 'DESC')->paginate(5);

    # Stre Data
        -- User::create($validated);

    # Retrieve Single data
        -- User::findOrFail($id)

    # Update data
        -- 

    # Delete data
        -- $user->delete();


## Installation guide from clone || github

    Reinstall the composer vendor
        -- composer install




