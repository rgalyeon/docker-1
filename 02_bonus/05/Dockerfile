# Bonus exercise: Specific Dockerfile for Ocaml projects.

FROM archlinux/base

MAINTAINER Dmirty Filin <dmifilin@gmail.com>

WORKDIR /home/ocamlproj

RUN pacman -Syu --noconfirm && pacman -S --noconfirm ocaml && \
	pacman -Sy --noconfirm vim && pacman -Sy --noconfirm git

