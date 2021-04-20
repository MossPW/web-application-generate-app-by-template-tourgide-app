package com.tourguide.example.silpakorn;

public class AugmentedPOI {
	private int mId;
	private int mainPoiID;
	private String mName;
	private String mDescription;
	private double mLatitude;
	private double mLongitude;
	private SetQuestion setQuestion;
	
	public AugmentedPOI(int mId,int mainPoiID,String newName,
						double newLatitude, double newLongitude,String newDescription,SetQuestion setQuestion) {
		this.mId = mId;
		this.mainPoiID = mainPoiID;
		this.mName = newName;
        this.mLatitude = newLatitude;
        this.mLongitude = newLongitude;
		this.mDescription = newDescription;
		this.setQuestion=setQuestion;
	}
	
	public int getPoiId() {
		return mId;
	}
	public void setPoiId(int poiId) {
		this.mId = poiId;
	}
	public int getMainPoiId() {
		return mainPoiID;
	}
	public void setMainPoiId(int mainPoiID) {
		this.mainPoiID = mainPoiID;
	}
	public String getPoiName() {
		return mName;
	}
	public void setPoiName(String poiName) {
		this.mName = poiName;
	}
	public String getPoiDescription() {
		return mDescription;
	}
	public void setPoiDescription(String poiDescription) {
		this.mDescription = poiDescription;
	}
	public double getPoiLatitude() {
		return mLatitude;
	}
	public void setPoiLatitude(double poiLatitude) {
		this.mLatitude = poiLatitude;
	}
	public double getPoiLongitude() {
		return mLongitude;
	}
	public void setPoiLongitude(double poiLongitude) {
		this.mLongitude = poiLongitude;
	}
	public SetQuestion getSetQuestion() {
		return setQuestion;
	}
	public void setSetQuestion(SetQuestion setQuestion) {
		this.setQuestion = setQuestion;
	}
}
