# Subscribify-Events-Laravel

A Laravel-based project implementing core subscription management and role-based access control, built using the Factory Pattern.

## 🏗 Completed Features

- **Roles & Authentication**  
  Implemented user roles and authentication logic via the Factory Pattern.

- **Subscription Management**  
  Subscription features developed using the Factory Pattern for modular extensibility.

## ⏳ Incomplete Features

- **Test Coverage (TDD)**  
  Initial TDD approach was planned, but deferred due to time constraints. Test cases and coverage are pending.

- **User Interface Improvements**  
  UI currently uses Laravel Breeze’s default scaffolding. UI/UX refinement, styling, and layout improvements are needed.

- **Additional Features**  
  Depending on project scope, may include: custom admin dashboard, subscription billing, Ticketing, email notifications, improved error handling, etc.

##  Tech Stack

- **Framework**: Laravel  
- **Architectural Pattern**: Factory Pattern for roles and subscriptions  
- **Frontend**: Laravel Breeze (default templates)  
- **Testing**: PHPUnit (tests yet to be implemented)

##  Setup

1. `git clone https://github.com/TanishGarge/subscribify-events-laravel.git`  
2. `cd subscribify-events-laravel`  
3. Copy `.env.example` to `.env`, and set database credentials  
4. Run `composer install` and `npm install && npm run dev`  
5. Run migrations: `php artisan migrate`  
6. Seed data: `php artisan db:seed`  
7. Serve the app: `php artisan serve`

##  Notes

- Emphasis on Factory Pattern to structure core business logic — helpful for scaling and expanding to new roles or subscription types.
- Prioritized functional backend completion over UI polish and full test coverage within tight timeline.
- Repository reflects foundational features and clear areas for further development.

##  License

This project is released under the MIT License.

