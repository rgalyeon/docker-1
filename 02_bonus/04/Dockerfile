# Bonus exercise: Specific Dockerfile for Go projects

FROM debian:9

MAINTAINER Dmirty Filin <dmifilin@gmail.com>

WORKDIR /usr/local

ENV GOROOT /usr/local/go
ENV GOPATH $HOME/work/goproj
ENV PATH $GOROOT/bin:$GOPATH/bin:$PATH

RUN apt-get update && apt-get -y upgrade \
	&& apt-get install wget -y && wget https://dl.google.com/go/go1.12.1.linux-amd64.tar.gz \
	&& tar -xvf go1.12.1.linux-amd64.tar.gz && rm -rf go1.12.1.linux-amd64.tar.gz \
	&& apt-get install vim -y && apt-get install git -y

WORKDIR $GOPATH
