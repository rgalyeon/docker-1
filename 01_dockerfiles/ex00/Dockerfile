# Exercise:  From an alpine image you’ll add to your container your favorite text editor, vim or
#            emacs, that will launch along with your container.
# How to run:  1) docker build -t ex00 .
#              2) docker run -it --rm ex00

FROM alpine
MAINTAINER Dmitry Filin <dmifilin@gmail.com>
RUN apk update && \
	apk upgrade && \
	apk add vim
ENTRYPOINT vim
