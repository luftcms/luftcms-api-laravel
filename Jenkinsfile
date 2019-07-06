node {
    checkout scm
    docker.image('mysql:5.7').withRun('-e "MYSQL_DATABASE=homestead" -e "MYSQL_USER=homestead" -e "MYSQL_PASSWORD=secret" -e "MYSQL_ROOT_PASSWORD=secret"') { c ->
        docker.image('mysql:5.7').inside("--link ${c.id}:database") {
            /* Wait until mysql service is up */
            sh 'while ! mysqladmin ping -hdatabase --silent; do sleep 1; done'
        }
        docker.image('sirnarsh/laravel-docker').inside("--link ${c.id}:database") {
            sh 'composer install --dev'
            sh 'cp .env.testing .env'
            sh 'php artisan migrate --force'
            sh 'php artisan db:seed'
            sh 'vendor/bin/phpunit --debug'
        }
    }
}
