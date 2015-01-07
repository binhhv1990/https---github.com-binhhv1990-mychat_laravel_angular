<?php
class ServiceTableSeeder extends Seeder{
	public function run(){
		Service::create(array(
			'title'=>'IOS',
			'decription'=>'IOS developer'
			));

		Service::create(array(
			'title'=>'Android',
			'decription'=>'Android developer'
			));
		Service::create(array(
			'title'=>'WindowsPhone',
			'decription'=>'WindowsPhone developer'
			));
		Service::create(array(
			'title'=>'Web',
			'decription'=>'Web developer'
			));
	}
}