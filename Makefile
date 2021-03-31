TAG?=14-alpine
CONTAINER?=$(shell basename $(CURDIR))-buildchain
DOCKERRUN=docker container run \
	--name ${CONTAINER} \
	--rm \
	-t \
	--network plugindev_default \
	-p 8080:8080 \
	-v `pwd`:/app \
	${CONTAINER}:${TAG}
DOCSDEST?=../../sites/nystudio107/web/docs/cookies

.PHONY: build dev docker docs install npm

build: docker install
	${DOCKERRUN} \
		run build
dev: docker install
	${DOCKERRUN} \
		run dev
docker:
	docker build \
		. \
		-t ${CONTAINER}:${TAG} \
		--build-arg TAG=${TAG} \
		--no-cache
docs: docker
	${DOCKERRUN} \
		run docs
	rm -rf ${DOCSDEST}
	mv ./docs/docs/.vuepress/dist ${DOCSDEST}
install: docker
	${DOCKERRUN} \
		install
npm: docker
	${DOCKERRUN} \
		$(filter-out $@,$(MAKECMDGOALS))
%:
	@:
# ref: https://stackoverflow.com/questions/6273608/how-to-pass-argument-to-makefile-from-command-line
