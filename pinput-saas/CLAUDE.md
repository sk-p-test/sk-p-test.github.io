# Pinput SaaS Development Guidelines

## Build & Test Commands
- PHP tests: `vendor/bin/phpunit` (all tests) or `vendor/bin/phpunit tests/TestFileName.php` (single)
- Next.js/React: `npm run dev` (development), `npm run build` (production), `npm run lint` (linting)
- Docker tests: Run `./local-test.sh` in respective project directories to build test containers

## Code Style
- PHP: PSR-12 standard with type hints where applicable
- TypeScript/React: Strict type checking with interfaces for data structures 
- Error handling: Use try/catch with specific exceptions and error messages
- Database: Use PDO with prepared statements to prevent SQL injection
- Security: JWT for authentication, validate all inputs, encrypt sensitive data

## Naming Conventions
- PHP classes: PascalCase (`UserAuthentication`)
- Variables/functions: camelCase (`getUserById()`)
- React components: PascalCase (`HeaderComponent`)
- Database columns: snake_case (`user_id`)
- Constants: UPPER_SNAKE_CASE (`API_KEY`)

## Project Structure
- Microservice architecture with API, Admin, App, and LP components
- Each project has configuration in `config/` directory
- Shared libraries in `modules/` or `library/` folders