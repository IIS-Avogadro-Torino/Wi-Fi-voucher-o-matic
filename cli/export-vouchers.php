# Export all the vouchers from the Ubiquiti MongoDB database
mongoexport \
	--host localhost:27117 \
	--db ace \
	--collection voucher \
	--csv \
	--out vouchers.csv \
	--fields _id,admin_name,code,create_time,duration,for_hotspot,note,qos_overwrite,qos_rate_max_down,qos_rate_max_up,qos_usage_quota,quota,site_id,used
