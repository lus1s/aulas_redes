# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
 
  config.vm.define "vm1" do |vm1|

    vm1.vm.hostname = "vm1"
    vm1.vm.box = "http://192.168.24.55/vagrant-boxes/focal64.box"
    vm1.vm.network "forwarded_port", guest: 80, host: 8080
    vm1.vm.network "private_network", ip: "192.168.56.10"
    vm1.vm.synced_folder "/var/shared", "/vagrant"
    end
    
    config.vm.provider "virtualbox" do |vb|
      vb.memory = "2048"
      vb.cpus = "2"
      config.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt install openssh-server
      apt-get install -y apache2
      SHELL
    end
  
  ####################################################################################
  config.vm.define "vm2" do |vm2|
    vm2.vm.hostname = "vm2"
    vm2.vm.box = "http://192.168.24.55/vagrant-boxes/focal64.box"
    vm2.vm.network "forwarded_port", guest: 80, host: 8181
    vm2.vm.network "private_network", ip: "192.168.56.10"
    vm2.vm.synced_folder "/var/shared", "/vagrant"
    end
    
    config.vm.provider "virtualbox" do |vb2|
      vb2.memory = "2048"
      vb2.cpus = "2"
      config.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2
      SHELL
    end
    ####################################################################################
  config.vm.define "vm3" do |vm3|
    vm3.vm.hostname = "vm3"
    vm3.vm.box = "http://192.168.24.55/vagrant-boxes/focal64.box"
    vm3.vm.network "forwarded_port", guest: 80, host: 8282
    vm3.vm.network "private_network", ip: "192.168.56.10"
    vm3.vm.synced_folder "/var/shared", "/vagrant"
    end
    
    config.vm.provider "virtualbox" do |vb3|
      vb3.memory = "2048"
      vb3.cpus = "2"
      config.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2
      SHELL
    end
end
