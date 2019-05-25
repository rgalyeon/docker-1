#How to build: 1) docker build -t ft-rails:on-build .

FROM ruby:2.6.2

MAINTAINER Dmirty Filin <dmifilin@gmail.com>

RUN apt-get update -y && apt-get upgrade -y &&\
	apt-get install nodejs -y

ONBUILD COPY app /opt/app

ONBUILD WORKDIR /opt/app

ONBUILD RUN gem install rails

ONBUILD RUN bundle install

ONBUILD RUN rake db:migrate

ONBUILD RUN rake db:seed
