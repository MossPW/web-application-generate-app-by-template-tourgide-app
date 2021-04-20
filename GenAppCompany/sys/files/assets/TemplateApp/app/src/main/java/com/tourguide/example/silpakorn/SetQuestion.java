package com.tourguide.example.silpakorn;

import java.util.ArrayList;

/**
 * Created by MarciaFesta Moss on 1/23/2018.
 */

public class SetQuestion {
    private ArrayList<QuestionLibrary> listQuestion = new ArrayList<QuestionLibrary>();
    public SetQuestion(){
       /* QuestionLibrary q1 = new QuestionLibrary(1,"พระร่วงโรจนฤทธิ์เป็นพระพุทธรูปปางอะไร",new String[] {"ปางประทานพร", "ปางห้ามญาติ", "ปางปรินิพพาน","ปางอุ้มบาตร"},new String[] {"ปางห้ามญาติ"});
        QuestionLibrary q2 = new QuestionLibrary(2,"ใต้ฐานพระร่วงโรจนฤทธิ์บรรจุพระบรมราชสรีรางคารของพระมหากษัตริย์รัชสมัยใด",new String[] { "พระบาทสมเด็จพระจุลจอมเกล้าเจ้าอยู่หัว","พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว"},new String[] {"พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว"});
        QuestionLibrary q3 = new QuestionLibrary(3,"พระร่วงโรจนฤทธิ์ได้รับการปั้นและหล่อขึ้นใหม่จนแล้วเสร็จ ในช่วงรัชสมัยใดบ้าง",new String[] {"พระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว", "พระบาทสมเด็จพระจุลจอมเกล้าเจ้าอยู่หัว", "พระบาทสมเด็จพระปกเกล้าเจ้าอยู่หัว","พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว"},new String[] {"พระบาทสมเด็จพระจุลจอมเกล้าเจ้าอยู่หัว","พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว"});
        QuestionLibrary q4 = new QuestionLibrary(4,"จงลำดับเหตุการณ์ความเป็นมาของพระร่วงโรจนฤทธิ์",new String[] { "รัชกาลที่ 6 ถวายพระนามพระพุทธรูปว่า 'พระร่วงโรจน์ฤทธิ์ ศรีอินทราทิตย์ธรรโมภาส มหาวชิราวุธราชบูชนิยบพิตร์'", "รัชกาลที่ 6 พบองค์พระเศียรกับพระหัตถ์ข้างหนึ่งและพระบาท ของพระร่วงโรจนฤทธิ์", "รัชกาลที่ 6 จัดพระราชพิธีสถาปนาพระพุทธรูปที่วัดพระเชตุพน","รัชกาลที่ 7 บรรจุพระบรมราชสรีรางคารของรัชกาลที่ 6 ใต้ฐานพระ" },new String[] {"รัชกาลที่ 6 พบองค์พระเศียรกับพระหัตถ์ข้างหนึ่งและพระบาท ของพระร่วงโรจนฤทธิ์","รัชกาลที่ 6 จัดพระราชพิธีสถาปนาพระพุทธรูปที่วัดพระเชตุพน","รัชกาลที่ 6 ถวายพระนามพระพุทธรูปว่า 'พระร่วงโรจน์ฤทธิ์ ศรีอินทราทิตย์ธรรโมภาส มหาวชิราวุธราชบูชนิยบพิตร์'","รัชกาลที่ 7 บรรจุพระบรมราชสรีรางคารของรัชกาลที่ 6 ใต้ฐานพระ"});

        addQuestion(q1);
        addQuestion(q2);
        addQuestion(q3);
        addQuestion(q4);*/


    }
    public void addQuestion(QuestionLibrary qustionQbj){
        this.listQuestion.add(qustionQbj);
    }
    public QuestionLibrary getQuestionList(int index){
        return listQuestion.get(index);
    }
    public int getSizeList(){
        return listQuestion.size();
    }
}
