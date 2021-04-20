package com.tourguide.example.silpakorn;

import android.Manifest;
import android.app.*;
import android.content.Context;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.content.pm.PackageManager;
import android.graphics.PixelFormat;
import android.hardware.Camera;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.provider.Settings;
import android.support.v4.app.ActivityCompat;
import android.view.SurfaceHolder;
import android.view.SurfaceView;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

public class CameraViewActivity extends Activity implements
        SurfaceHolder.Callback, /*OnLocationChangedListener,*/ OnAzimuthChangedListener {
    private LocationManager managerLocation;
    private Criteria criteria;
    String locationProvider;
    Location location;
    static float MinDistanceChangeForUpdates = 1;
    static long MinTimeForUpdates = 10000;

    private Camera mCamera;
    private SurfaceHolder mSurfaceHolder;
    private boolean isCameraviewOn = false;
    private AugmentedPOI mPoi;
    private ArrayList<AugmentedPOI> mPoiList;
    private double mAzimuthReal = 0;
    private double mAzimuthTeoretical = 0;
    private static double AZIMUTH_ACCURACY = 13;
    private double mMyLatitude = 0;
    private double mMyLongitude = 0;
    private Button questionArButton;
    private Button detailArButton;
    private Button Ar;
    private Button mapButton;
    private Button scoreButton;
    private MyCurrentAzimuth myCurrentAzimuth;
    private MyCurrentLocation myCurrentLocation;
    private CalLoctaion mCalLocation = new CalLoctaion();

    TextView descriptionTextView;
    ImageView pointerIcon;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_camera_view);
        //*request screen portrait*//
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        Ar = (Button) findViewById(R.id.Ar);
        questionArButton = (Button) findViewById(R.id.btnArQuestion);
        detailArButton = (Button) findViewById(R.id.btnArDetail);
        mapButton = (Button) findViewById(R.id.btnMap);
        scoreButton = (Button) findViewById(R.id.btnScore);


        mapButton.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {

                Intent intent = new Intent(getBaseContext(), MapActivity.class);
                startActivity(intent);
            }
        });
        scoreButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getBaseContext(), TotalScore.class);
                startActivity(intent);
            }
        });

        // location

        managerLocation = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
        criteria = new Criteria();
        criteria.setAccuracy(Criteria.ACCURACY_FINE);
        criteria.setPowerRequirement(Criteria.POWER_LOW);
        locationProvider = managerLocation.getBestProvider(criteria, true);
        location = managerLocation.getLastKnownLocation(locationProvider);

        if (location == null) {
            Intent in = new Intent(Settings.ACTION_LOCATION_SOURCE_SETTINGS);
            startActivity(in);
        } else if (location != null) {
            listenerLocation.onLocationChanged(location);
        }
        //

        setupListeners();
        setupLayout();
        setAugmentedRealityPoint();
    }

    private void setAugmentedRealityPoint() {
        mPoiList = new ArrayList<>();
        mPoiList = new SetLocation().getLocationList(); // get list Location
    }

    public double calculateTeoreticalAzimuth(AugmentedPOI mp) {
        double dX = mp.getPoiLatitude() - mMyLatitude;
        double dY = mp.getPoiLongitude() - mMyLongitude;

        double phiAngle;
        double tanPhi;
        double azimuth = 0;

        tanPhi = Math.abs(dY / dX);
        phiAngle = Math.atan(tanPhi);
        phiAngle = Math.toDegrees(phiAngle);//bearing  >>56
        //ดู dy dx เป็น + หรือ -
        if (dX > 0 && dY > 0) { // I quater  ++
            return azimuth = phiAngle;
        } else if (dX < 0 && dY > 0) { // II -+
            return azimuth = 180 - phiAngle;
        } else if (dX < 0 && dY < 0) { // III  --
            return azimuth = 180 + phiAngle;
        } else if (dX > 0 && dY < 0) { // IV  +-  ---- **
            return azimuth = 360 - phiAngle;
        }

        return phiAngle;
    }

    private List<Double> calculateAzimuthAccuracy(double azimuth) {
        double minAngle = azimuth - AZIMUTH_ACCURACY;
        double maxAngle = azimuth + AZIMUTH_ACCURACY;
        List<Double> minMax = new ArrayList<Double>();

        if (minAngle < 0)
            minAngle += 360;

        if (maxAngle >= 360)
            maxAngle -= 360;

        minMax.clear();
        minMax.add(minAngle);
        minMax.add(maxAngle);

        return minMax;
    }

    private boolean isBetween(double minAngle, double maxAngle, double azimuth) {
        if (minAngle > maxAngle) {
            if (isBetween(0, maxAngle, azimuth) && isBetween(minAngle, 360, azimuth))
                return true;
        } else {
            if (azimuth > minAngle && azimuth < maxAngle)
                return true;
        }
        return false;
    }

    private String getStr() {
        String str = "";
        for (AugmentedPOI a : mPoiList) {
            str += a.getPoiName() + " ";
        }
        return str;
    }

    private void updateDescription() {

       /* descriptionTextView.setText( getStr() + " azimuthTeoretical "
                + mAzimuthTeoretical + " azimuthReal " + mAzimuthReal + " latitude "
                + mMyLatitude + " longitude " + mMyLongitude);*/
       /* String str = Integer.toString(mp);

        descriptionTextView.setText(str);*/
    }

    /* @Override
     public void onLocationChanged(Location location) {
         mMyLatitude = location.getLatitude();
         mMyLongitude = location.getLongitude();
         //  mAzimuthTeoretical = calculateTeoreticalAzimuth();
         //Toast.makeText(this,"latitude: "+location.getLatitude()+" longitude: "+location.getLongitude(), Toast.LENGTH_SHORT).show();
         //  updateDescription();
     }*/
    //Location
    private final LocationListener listenerLocation = new LocationListener() {
        @Override
        public void onLocationChanged(Location location) {
            if (location != null) {
                Toast.makeText(CameraViewActivity.this,"latitude: "+location.getLatitude()+" longitude: "+location.getLongitude(), Toast.LENGTH_SHORT).show();

                mMyLatitude = location.getLatitude();
                mMyLongitude = location.getLongitude();
            } else {
                Toast.makeText(CameraViewActivity.this, "Not found Location",
                        Toast.LENGTH_LONG).show();
            }
        }

        @Override
        public void onStatusChanged(String provider, int status, Bundle extras) {

        }

        @Override
        public void onProviderEnabled(String provider) {

        }

        @Override
        public void onProviderDisabled(String provider) {

        }
    };
    ///loaction new //

    @Override
    public void onAzimuthChanged(float azimuthChangedFrom, float azimuthChangedTo) {
        mAzimuthReal = azimuthChangedTo;
        updateDescription();
        // pointerIcon = (ImageView) findViewById(R.id.icon);
        Ar.setVisibility(View.INVISIBLE);
        questionArButton.setVisibility(View.INVISIBLE);
        detailArButton.setVisibility(View.INVISIBLE);

        float minDistance = mCalLocation.minDistancePoi(mMyLatitude, mMyLongitude, mPoiList);
        for (AugmentedPOI mp : mPoiList) {
            float distance = mCalLocation.distanceFrom_in_Km(mMyLatitude, mMyLongitude, mp.getPoiLatitude(), mp.getPoiLongitude());

            if (minDistance == distance) { //factor mindistance
                if (minDistance <= 8) {//<= 100 metter
                    showArPOI(mp);
                } else if (minDistance <= 15) {
                    mAzimuthTeoretical = calculateTeoreticalAzimuth(mp); //sent location for cal azimuth
                    // updateDescription(mp);
                    double minAngle = calculateAzimuthAccuracy(mAzimuthTeoretical).get(0);
                    double maxAngle = calculateAzimuthAccuracy(mAzimuthTeoretical).get(1);
                    if (isBetween(minAngle, maxAngle, mAzimuthReal) /*&& distance <= 250.0*/) { //AR Show
                        //  pointerIcon.setVisibility(View.VISIBLE);
                        showArPOI(mp);
                    }
                }
            }
        }
    }

    public void showArPOI(AugmentedPOI mp) {
        //show AR na
        Ar.setVisibility(View.VISIBLE);
        questionArButton.setVisibility(View.VISIBLE);
        detailArButton.setVisibility(View.VISIBLE);

        Ar.setText(mp.getPoiName()/* + " short focus "+distance*/);
        final String mpName = mp.getPoiName();
        final int mpID = mp.getPoiId();
        questionArButton.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getBaseContext(), QuestionActivity.class);
                intent.putExtra("mpID", mpID);
                startActivity(intent);
            }
        });

        detailArButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getBaseContext(), DetailActivity.class);
                intent.putExtra("mpID", mpID);
                startActivity(intent);
            }
        });
    }

    @Override
    protected void onStart() {
        managerLocation.requestLocationUpdates(locationProvider, MinTimeForUpdates,
                MinDistanceChangeForUpdates, listenerLocation);
        super.onStart();
    }

    @Override
    protected void onRestart() {
        managerLocation.removeUpdates(listenerLocation);
        super.onRestart();
    }

    @Override
    protected void onStop() {
        myCurrentAzimuth.stop();
      //  myCurrentLocation.stop();
        super.onStop();
    }

    @Override
    protected void onResume() {
        super.onResume();
        myCurrentAzimuth.start();
       // myCurrentLocation.start();
    }

    private void setupListeners() {
        //myCurrentLocation = new MyCurrentLocation(this);
      //  myCurrentLocation.buildGoogleApiClient(this);
       // myCurrentLocation.start();

        myCurrentAzimuth = new MyCurrentAzimuth(this,this);
        myCurrentAzimuth.start();
    }

    private void setupLayout() {
     //   descriptionTextView = (TextView) findViewById(R.id.cameraTextView);

        getWindow().setFormat(PixelFormat.UNKNOWN);
        SurfaceView surfaceView = (SurfaceView) findViewById(R.id.cameraview);
        mSurfaceHolder = surfaceView.getHolder();
        mSurfaceHolder.addCallback(this);
        mSurfaceHolder.setType(SurfaceHolder.SURFACE_TYPE_PUSH_BUFFERS);
    }

    @Override
    public void surfaceChanged(SurfaceHolder holder, int format, int width,
                               int height) {
        if (isCameraviewOn) {
            mCamera.stopPreview();
            isCameraviewOn = false;
        }

        if (mCamera != null) {
            try {
                mCamera.setPreviewDisplay(mSurfaceHolder);
                mCamera.startPreview();
                isCameraviewOn = true;
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    @Override
    public void surfaceCreated(SurfaceHolder holder) {
        mCamera = Camera.open();
        mCamera.setDisplayOrientation(90);
    }

    @Override
    public void surfaceDestroyed(SurfaceHolder holder) {
        mCamera.stopPreview();
        mCamera.release();
        mCamera = null;
        isCameraviewOn = false;
    }
}
