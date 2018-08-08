# How to export vouchers from Ubiquiti

Run this from your local Ubiquiti controller machine to obtain a `vouchers.csv` file:

	mongoexport \
		--host localhost:27117 \
		--db ace \
		--collection voucher
		--out vouchers.csv \
		--csv \
		--fields _id,admin_name,code,create_time,duration,for_hotspot,note,qos_overwrite,qos_rate_max_down,qos_rate_max_up,qos_usage_quota,quota,site_id,used
  
Then you can import these vouchers using the `cli/import-vouchers.php` import script.
