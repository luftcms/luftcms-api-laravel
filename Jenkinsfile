pipeline {
	agent {
		docker {
			image 'sirnarsh/laravel-docker'
		}
	}
	stages {
		stage('testing') {
			steps {
				script {
                    sh 'cp .env.testing .env'
                    sh 'docker-compose up -d'
                    sh 'docker-compose run --rm --entrypoint \'composer install\' laravel'
                    sh 'docker-compose run --rm --entrypoint \'php artisan migrate --force\' laravel'
                    sh 'docker-compose run --rm --entrypoint \'php artisan db:seed\' laravel'
                    sh 'docker-compose run --rm --entrypoint \'vendor/bin/phpunit\' laravel'
                }
            }
        }
    }
}
