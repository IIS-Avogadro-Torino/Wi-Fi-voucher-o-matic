# How to import vouchers

Run this from the local Ubiquiti controller machine:

    mongoexport --verbose --host localhost:27117 --db ace --collection voucher --out $MY_OUTPUT.csv --fields _id,admin_name,code,create_time,duration,for_hotspot,note,qos_overwrite,qos_rate_max_down,qos_rate_max_up,qos_usage_quota,quota,site_id,used
  
  Then run the import script.
