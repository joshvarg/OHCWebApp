Create table if not exists DOCTOR (
    dSSN char(9) primary key not null,
    dName varchar(255) not null
);

Create table if not exists HOSPITAL (
    hospitalID char(5) primary key not null,
    hName varchar(255) not null,
    hAddress varchar(255) not null,
    UNIQUE(hName),
    UNIQUE(hAddress)
);

Create table if not exists DOCTOR_DAYS (
    day varchar(10) not null,
    dSSN char(9) not null,
    hospitalID char(5) not null,
    PRIMARY KEY(hospitalID, day, dSSN),
    FOREIGN KEY(hospitalID) REFERENCES HOSPITAL(hospitalID),
    FOREIGN KEY(dSSN) REFERENCES DOCTOR(dSSN)
);

Create table if not exists SCHEDULE (
    hospitalID char(5) not null,
    sTime time not null,
    day varchar(10) not null,
    dSSN char(9) not null,
    PRIMARY KEY(hospitalID, sTime, day, dSSN),
    FOREIGN KEY(hospitalID) REFERENCES HOSPITAL(hospitalID)
);

Create table if not exists TREATMENT (
    treatmentCode char(5) not null,
    tName varchar(255) not null,
    primary key(treatmentCode),
    UNIQUE(tName)
);

Create table if not exists SERVICE_FEES (
    hospitalID char(5) not null,
    code char(5) not null,
    in_fee float not null,
    out_fee float not null,
    PRIMARY KEY (hospitalID, code),
    FOREIGN KEY (hospitalID) REFERENCES HOSPITAL(hospitalID),
    FOREIGN KEY (code) REFERENCES TREATMENT(treatmentCode)
);
Create table if not exists BILL (
    billID int primary key not null AUTO_INCREMENT,
    day varchar(10) not null,
    dSSN char(9) not null,
    balance float,
    hospitalID char(5) not null,
    bTime time not null,
    facility_fee float,
    pSSN char(9) not null,
    FOREIGN KEY(hospitalID) REFERENCES HOSPITAL(hospitalID)
);

Create table if not exists PATIENT (
    pSSN char(9) primary key,
    pName varchar(255) not null,
    in_network boolean not null
);

Create table if not exists PRACTICES_AT (
    dSSN char(9) not null,
    hospitalID char(5) not null,
    fee float not null,
    PRIMARY KEY(dSSN, hospitalID),
    FOREIGN KEY(dSSN) REFERENCES DOCTOR(dSSN)
);

Create table if not exists ITEMIZED_IN (
    treatmentCode char(5) not null,
    billID char(5) not null,
    PRIMARY KEY (treatmentCode, billID)
);

Create table if not exists DOCTOR_TREATMENT_FEE (
    treatmentCode char(5) not null,
    dSSN char(9) not null,
    in_fee float not null,
    out_fee float not null,
    PRIMARY KEY (treatmentCode, dSSN)
);

Create table if not exists APPOINTMENT(
    aTime time not null,
    day varchar(10) not null,
    dSSN char(9) not null,
    pSSN char(9),
    hospitalID char(5),
    treatmentCode char(5),
    PRIMARY KEY (pSSN,aTime,day,dSSN,hospitalID),
    FOREIGN KEY(hospitalID, aTime, day, dSSN) REFERENCES SCHEDULE(hospitalID, sTime, day, dSSN),
    FOREIGN KEY(pSSN) REFERENCES PATIENT(pSSN),
    FOREIGN KEY(treatmentCode) REFERENCES TREATMENT(treatmentCode)
);

Create table if not exists DOCTOR_TREATMENT (
	dTCode char(10) not null,
	dSSN char (9) not null,
	tHID char(10) not null,
	primary key (dTCode, dSSN, tHID)
);

delimiter #
Create trigger BillTrigger after insert on appointment
for each row
  begin
    set @pssn = new.pSSN;
    select in_network from patient where pSSN=@pssn into @inn;
    set @dssn = new.dSSN;
    set @tcode = new.treatmentCode;
    select in_fee, out_fee from doctor_treatment_fee where dSSN=@dssn and treatmentCode=@tcode into @ifee, @ofee;
    set @bal = '0';
    set @ffee = '0';
    set @hid = new.hospitalID;
    select in_fee, out_fee from service_fees where hospitalID=@hid and code=@tcode into @ifee1, @ofee1;
    if (@inn) then
      set @bal = @ifee + @ifee1;
      set @ffee = @ifee1;
    else
      set @bal = @ofee + @ofee1;
      set @ffee = @ofee1;
    end if;
    insert into bill(day, dSSN, hospitalID, bTime, pSSN, facility_fee, balance) values (new.day, @dssn, new.hospitalID, new.aTime, @pssn, @ffee, @bal);
  end#
delimiter ;
