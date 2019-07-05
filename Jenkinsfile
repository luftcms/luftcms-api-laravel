pipeline {
	agent {
		none
	}
	stages {
		stage('testing') {
			steps {
				script {
                    sh 'sudo rm /usr/local/bin/docker-compose'
                    sh 'curl -L https://github.com/docker/compose/releases/download/${DOCKER_COMPOSE_VERSION}/docker-compose-`uname -s`-`uname -m` > docker-compose'
                    sh 'chmod +x docker-compose'
                    sh 'sudo mv docker-compose /usr/local/bin'
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
