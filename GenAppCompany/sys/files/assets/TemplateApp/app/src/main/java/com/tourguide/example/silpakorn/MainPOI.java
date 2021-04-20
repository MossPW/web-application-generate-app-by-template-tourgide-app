package com.tourguide.example.silpakorn;

/**
 * Created by MarciaFesta Moss on 3/18/2018.
 */

public class MainPOI {
    private int mainPoiID;
    private String mainPoiName;
    private double mainPoiLatitude;
    private double mainPoiLongitude;

    public MainPOI(int mainPoiID,String mainPoiName,double mainPoiLatitude,double mainPoiLongitude) {
        this.setMainPoiID(mainPoiID);
        this.setMainPoiName(mainPoiName);
        this.setMainPoiLatitude(mainPoiLatitude);
        this.setMainPoiLongitude(mainPoiLongitude);

    }

    public int getMainPoiID() {
        return mainPoiID;
    }

    public void setMainPoiID(int MainPoiID) {
        this.mainPoiID = MainPoiID;
    }

    public String getMainPoiName() {
        return mainPoiName;
    }

    public void setMainPoiName(String MainPoiName) {
        this.mainPoiName = MainPoiName;
    }

    public double getMainPoiLatitude() {
        return mainPoiLatitude;
    }

    public void setMainPoiLatitude(double MainPoiLatitude) {
        this.mainPoiLatitude = MainPoiLatitude;
    }

    public double getMainPoiLongitude() {
        return mainPoiLongitude;
    }

    public void setMainPoiLongitude(double MainPoiLongitude) {
        this.mainPoiLongitude = MainPoiLongitude;
    }
}
