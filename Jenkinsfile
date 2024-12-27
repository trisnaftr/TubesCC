pipeline {
    agent any

    stages {
        stage('Git checkout') {
            steps {
                echo "Checking out the code from SCM"
                checkout scm
                sleep 1
            }
        }

        stage('Docker build image') {
            steps {
                echo "Building Docker image"
                sleep 2
            }
        }

        stage('Push docker images to DockerHub') {
            steps {
                echo "Pushing Docker image to DockerHub"
                sleep 2
            }
        }

    }

    post {
        success {
            echo "Pipeline executed successfully!"
        }
        failure {
            echo "Pipeline failed!"
        }
    }
}
