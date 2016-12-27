<?php
	class UserAddress extends Eloquent{
		protected $table = 'user_address';
		protected $primaryKey = 'id';

		public function insertAddress($user_id, $name, $district, $city, $address, $postal_code, $phone_number){
			
			$data_address = new UserAddress();
			$data_address->user_id = $user_id;
			$data_address->name = $name;
			$data_address->district = $district;
			$data_address->city = $city;
			$data_address->address = $address;
			$data_address->postal_code = $postal_code;
			$data_address->phone_number = $phone_number;
			$data_address->save();
		}

		public function editAddress($address_id, $name, $district, $city, $address, $postal_code, $phone_number){
			
			$data_address = UserAddress::find($address_id);
			$data_address->name = $name;
			$data_address->district = $district;
			$data_address->city = $city;
			$data_address->address = $address;
			$data_address->postal_code = $postal_code;
			$data_address->phone_number = $phone_number;
			$data_address->save();

		}
	}
?>