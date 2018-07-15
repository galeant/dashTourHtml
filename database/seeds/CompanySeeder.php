<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
			[
				'companyName' => 'a',
				'fullName' => 'jalan',
				'phone' => 'jalan',
				'email' => 'jalan',
				'role' => 'Owner',
				'companyPhone' => 'jalan',
				'companyEmail' => 'jalan',
				'companyWeb' => 'jalan',
				'companyProvince' => 'jalan',
				'companyCity' => 'jalan',
				'companyAddress' => 'jalan',
				'companyPostal' => 'jalan',
				'companyBookSystem' => 'jalan',
				'companyBankName' => 'jalan',
				'companyBankAccountNumber' => 'jalan',
				'companyBankAccountName' => 'jalan',
				'bankAccountScanUrl' => 'bank_account_url',
				'aktaUrl' => 'akta_account_url',
				'siupUrl' => 'siup_account_url',
				'npwpUrl' => 'npwp_account_url',
				'ktpUrl' => 'ktp_account_url',
				'evidanceUrl' => 'evidance_account_url',
				'status' => 'active'
			],
			[
				'companyName' => 'Simalakamaa',
				'fullName' => 'SIMALAKAMAAAA',
				'phone' => '019201291020',
				'email' => 'email@email.com',
				'role' => 'Owner',
				'companyPhone' => '12123123',
				'companyEmail' => 'www.com',
				'companyWeb' => 'emailcompany@company.com',
				'companyProvince' => 'jalan',
				'companyCity' => 'jalan',
				'companyAddress' => 'jalan',
				'companyPostal' => 'jalan',
				'companyBookSystem' => 'jalan',
				'companyBankName' => 'jalan',
				'companyBankAccountNumber' => 'jalan',
				'companyBankAccountName' => 'jalan',
				'bankAccountScanUrl' => 'bank_account_url',
				'aktaUrl' => 'akta_account_url',
				'siupUrl' => 'siup_account_url',
				'npwpUrl' => 'npwp_account_url',
				'ktpUrl' => 'ktp_account_url',
				'evidanceUrl' => 'evidance_account_url',
				'status' => 'active'
			]
        ]);
    }
}
