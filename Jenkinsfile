node {
    checkout scm
    docker.image('mysql:5.7').withRun('-e "MYSQL_ROOT_PASSWORD=my-secret-pw"') { c ->
        docker.image('mysql:5.7').inside("--link ${c.id}:db") {
            /* Wait until mysql service is up */
            sh 'while ! mysqladmin ping -hdb --silent; do sleep 1; done'
        }
        docker.image('sirnarsh/laravel-docker').inside("--link ${c.id}:db") {
            sh 'composer install --dev'
            sh 'cp .env.testing .env'
            sh 'php artisan migrate --force'
            sh 'php artisan db:seed'
            sh 'vendor/bin/phpunit --debug'
        }
    }
}
