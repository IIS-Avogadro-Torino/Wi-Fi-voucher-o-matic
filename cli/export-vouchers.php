#!/bin/bash
# Export all the vouchers from the Ubiquiti MongoDB database
if [ -z "$1" ]; then
	echo "Usage:"
	echo "	$0 FILENAME.csv"
	exit 1
fi
mongoexport \
	--host localhost:27117 \
	--db ace \
	--collection voucher \
	--csv \
	--out "$FILENAME" \
	--fields _id,admin_name,code,create_time,duration,for_hotspot,note,qos_overwrite,qos_rate_max_down,qos_rate_max_up,qos_usage_quota,quota,site_id,used
