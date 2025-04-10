IMAGE_NAME=fsm-app

build:
	docker build -t $(IMAGE_NAME) .

modThree:
	docker run --rm $(IMAGE_NAME) php modThree.php $(ARGS)

test:
	docker run --rm $(IMAGE_NAME) php vendor/bin/phpunit
