package com.tourguide.example.silpakorn;

import java.util.ArrayList;

/**
 * Created by MarciaFesta Moss on 10/28/2017.
 */

public class CalLoctaion {

    public float distanceFrom_in_Km(double lat1, double lng1, double lat2, double lng2)  {
        if (lat1== 0 || lng1== 0 || lat2== 0 || lng2== 0)
        {
            return 0;
        }
        double earthRadius = 6371000; //meters
        double dLat = Math.toRadians(lat2-lat1);
        double dLng = Math.toRadians(lng2-lng1);
        double a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(Math.toRadians(lat1)) * Math.cos(Math.toRadians(lat2)) *
                        Math.sin(dLng/2) * Math.sin(dLng/2);
        double c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        float dist = (float) (earthRadius * c);
        return dist;
    }

    public float minDistancePoi(double lat1, double lng1, ArrayList<AugmentedPOI> mPoiList){
        float MIN = Float.MAX_VALUE; //min value
        for (AugmentedPOI mp : mPoiList) {
            double lat2 =   mp.getPoiLatitude();
            double lng2 =   mp.getPoiLongitude();
            float distanceCal = distanceFrom_in_Km(lat1,lng1,lat2,lng2);
           if(distanceCal<MIN){
               MIN = distanceCal;
           }
        }
        return MIN;
    }


    }

