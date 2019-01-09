# laravel-datatable
Setting up project:
	- cd <project_dir>/Docker/local_dev_setup
	- docker build --rm -t local/laravel_task_db -f Dockerfile_db .
	- docker build --rm -t local/laravel .
	- docker-compose up
	
Run Db migrate
web url: localhost:8080
