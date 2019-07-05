pipeline {
  agent {
    docker {
      image 'sirnarsh/laravel-docker'
    }

  }
  stages {
    stage('testing') {
      agent {
        docker {
          image 'mysql:5.7'
          args '-p 3306:3306'
        }

      }
      environment {
        MYSQL_DATABASE = 'homestead'
        MYSQL_USER = 'homestead'
        MYSQL_PASSWORD = 'secret'
        MYSQL_ROOT_PASSWORD = 'secret'
      }
      steps {
        sh 'composer install'
        sh 'cp .env.testing .env'
        sh 'php artisan migrate --force'
        sh 'php artisan db:seed'
        sh '''vendor/bin/phpunit
'''
      }
    }
  }
}