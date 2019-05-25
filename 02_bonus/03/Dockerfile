FROM continuumio/miniconda3

ENV ACCEPT_INTEL_PYTHON_EULA=yes
WORKDIR /home/notebooks
ADD requirements.txt /app/
RUN apt-get update -y && apt-get upgrade -y \
		&& apt-get install -y -q g++ && apt-get install git \
		&& conda config --add channels intel && conda install  -y -q intelpython3_full python=3 \ 
		&& pip install --upgrade pip && pip install -r /app/requirements.txt \
		&& pip install jupyter

CMD jupyter notebook --port=8888 --no-browser --ip=0.0.0.0 --allow-root
