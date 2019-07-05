pipeline {
  agent {
    docker {
      image 'sirnarsh/laravel-docker'
    }
  }
  stages {
    stage('testing') {
        steps {
          docker.image('mysql:5.7').withRun('-e "MYSQL_DATABASE=homestead" -e "MYSQL_USER=homestead" -e "MYSQL_PASSWORD=secret" -e "MYSQL_ROOT_PASSWORD=secret" -p 3306:3306') { c ->
            sh 'composer install'
            sh 'cp .env.testing .env'
            sh 'php artisan migrate --force'
            sh 'php artisan db:seed'
            sh 'vendor/bin/phpunit'
          }
        }
    }    
  }
}
