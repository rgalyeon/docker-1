# Exercise:  From a debian image you will add the appropriate sources to create a TeamSpeak
#            server, that will launch along with your container. It will be deemed valid if at least
#            one user can connect to it and engage in a normal discussion (no far-fetched setup), so
#            be sure to create your Dockerfile with the right options. Your program should get the
#            sources when it builds, they cannot be in your repository.
#
# How to run:  1) docker build -t ex01 .
#              2) docker run --rm -p 9987:9987/udp -p 10011:10011 -p 30033:30033 -p 10022:10022 ex01

FROM debian

MAINTAINER Dmirty Filin <dmifilin@gmail.com>

WORKDIR /home/teamspeak

ENV TS3SERVER_LICENSE=accept

RUN apt-get update -y && apt-get upgrade -y && \
	apt-get install wget -y && apt-get install bzip2 -y &&  \
	wget https://files.teamspeak-services.com/releases/server/3.7.0/teamspeak3-server_linux_amd64-3.7.0.tar.bz2 && \
	tar -xvf teamspeak3-server_linux_amd64-3.7.0.tar.bz2 && \
	rm -rf teamspeak3-server_linux_amd64-3.7.0.tar.bz2

EXPOSE 9987/udp 10011/tcp 30033/tcp 10022/tcp

WORKDIR teamspeak3-server_linux_amd64

ENTRYPOINT ["./ts3server_minimal_runscript.sh"]
