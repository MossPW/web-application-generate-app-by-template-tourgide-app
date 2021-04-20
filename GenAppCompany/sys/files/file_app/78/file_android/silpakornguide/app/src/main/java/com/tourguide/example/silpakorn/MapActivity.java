package com.tourguide.example.silpakorn;

import android.Manifest;
import android.content.pm.ActivityInfo;
import android.content.pm.PackageManager;
import android.content.res.Resources;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.maps.CameraUpdate;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import java.util.ArrayList;
public class MapActivity extends AppCompatActivity implements OnMapReadyCallback {

    GoogleMap googleMap;
    private static final double TARGET_LATITUDE = 13.804521;
    private static final double TARGET_LONGITUDE = 100.0412968;
    private ArrayList<AugmentedPOI> mPoiList = new ArrayList<>();
    private ArrayList<MainPOI> mMainPoiList = new ArrayList<>();
    //สีของหมุด//
    float   HUE_AZURE;
    float   HUE_BLUE;
    float   HUE_CYAN;
    float   HUE_GREEN;
    float   HUE_MAGENTA;
    float   HUE_ORANGE;
    float   HUE_RED;
    float   HUE_ROSE;
    float   HUE_VIOLET;
    float   HUE_YELLOW;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_map);
        //*request screen portrait*//
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        mPoiList = new SetLocation().getLocationList(); /// get list Location
        mMainPoiList = new SetLocation().getMainPoiList();/// get list superPOI

        createMapView();
        addMarker();
     /** wait remove**/
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {

            return;
        }
        googleMap.setMyLocationEnabled(true);
    }
    private void createMapView(){

        try {
            if(null == googleMap){
                googleMap = ((MapFragment) getFragmentManager().findFragmentById(
                        R.id.mapView)).getMap();
                googleMap.setMapType(GoogleMap.MAP_TYPE_SATELLITE); //set type map earth

                if(null == googleMap) {
                    Toast.makeText(getApplicationContext(),
                            "Error creating map",Toast.LENGTH_SHORT).show();
                }
            }
        } catch (NullPointerException exception){
            Log.e("mapApp", exception.toString());
        }

    }
    private void addMarker(){
       //ซูมแผนที่มายังพิกัดสถานที่หลัก(Main POI)อันดับแรก
        double lat = TARGET_LATITUDE;
        double lng = TARGET_LONGITUDE;
        MainPOI objMainPOI = mMainPoiList.get(0);
        if(objMainPOI!=null) {
            lat = objMainPOI.getMainPoiLatitude();
            lng = objMainPOI.getMainPoiLongitude();
        }
        CameraPosition cameraPosition = new CameraPosition.Builder()
                .target(new LatLng(lat, lng))
                .zoom(15)
                .build();

        CameraUpdate cameraUpdate = CameraUpdateFactory.newCameraPosition(cameraPosition);
        googleMap.animateCamera(cameraUpdate);
        if(null != googleMap){

            for (AugmentedPOI mp : mPoiList) {
            googleMap.addMarker(new MarkerOptions()
                    .position(new LatLng(mp.getPoiLatitude(), mp.getPoiLongitude()))
                    .title(mp.getPoiName())
                    .draggable(false)
            );
            }
            //marker MainPOI
            for (MainPOI mp : mMainPoiList) {
                googleMap.addMarker(new MarkerOptions()
                        .position(new LatLng(mp.getMainPoiLatitude(), mp.getMainPoiLongitude()))
                        .title(mp.getMainPoiName())
                        .draggable(false)
                        .icon(BitmapDescriptorFactory
                                .defaultMarker(BitmapDescriptorFactory.HUE_GREEN))
                );
            } ///

            googleMap.setInfoWindowAdapter(new GoogleMap.InfoWindowAdapter(
            ) {
                @Override
                public View getInfoWindow(Marker marker) {
                    return null;
                }

                @Override
                public View getInfoContents(Marker marker) {
                    View infoWindow = getLayoutInflater().inflate(R.layout.custom_info_contens, null);
                    TextView title = ((TextView) infoWindow.findViewById(R.id.title));
                    title.setText(marker.getTitle());

                    ImageView imageView = (ImageView) infoWindow.findViewById(R.id.imageView);
                    imageView.setImageResource(R.drawable.ic_launcher); // เริ่มแรกจะเป็นรูปในกรณีไม่มีรูป ไม่พบรูป

                    //แสดงรูปภาพ สถานที่หลัก
                    for (MainPOI mp : mMainPoiList) {
                        if (mp.getMainPoiName().equals(marker.getTitle())) {
                            int mID = mp.getMainPoiID();
                            String mMainId = "mpoi" + mID;
                            int resID = MapActivity.this.getResources().getIdentifier(mMainId, "drawable", getPackageName());
                            imageView.setImageResource(resID);
                        }
                    }
                    //แสดงรูปภาพ สถานที่ย่อย
                    for (AugmentedPOI mp : mPoiList) {
                        if (mp.getPoiName().equals(marker.getTitle())) {
                            int mID = mp.getPoiId();
                            String mid = "poi" + mID;
                            int resID = MapActivity.this.getResources().getIdentifier(mid, "drawable", getPackageName());
                            imageView.setImageResource(resID);
                        }
                    }
                    return infoWindow;
                }
            });
        }
    }

   /* public String getNameMainPOI(int mainPoiID){
        MainPOI objMainPOI = new SetLocation().searchMainPosition(mainPoiID);
        return objMainPOI.getMainPoiName();
    }*/
    @Override
    public void onMapReady(GoogleMap googleMap) {

    }
}

