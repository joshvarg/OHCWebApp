Create table if not exists DOCTOR (
    dSSN char(9) primary key not null,
    dName varchar(255) not null,
);

Create table if not exists SCHEDULE (
    hospitalID char(5) not null,
    sTime time not null,
    day varchar(10) not null,
    dSSN char(9) not null,
    PRIMARY KEY(scheduleID)
);

Create table if not exists TREATMENT (
    treatmentCode char(5) not null,
    tName varchar(255) not null,
    treatment_fee float not null,
    primary key(treatmentCode),
    UNIQUE(tName),
);

Create table if not exists HOSPITAL (
    hospitalID char(5) primary key not null,
    hName varchar(255) not null,
    hAddress varchar(255) not null,
    UNIQUE(hName),
    UNIQUE(hAddress),
);

Create table if not exists BILL (
    billID char(5) primary key not null,
    day varchar(10) not null,
    dName varchar(255) not null,
    balance float not null,
    hName varchar(255) not null,
    bTime time not null,
    facility_fee float not null,
    pSSN char(9) not null,
    hName REFERENCES HOSPITAL(hospitalID),
);

Create table if not exists PATIENT (
    pSSN char(9) primary key,
    pName varchar(255) not null,
    in_network boolean not null,
);

Create table if not exists IN_OHC (
    billID char(5) primary key,
    rate float not null,
    billID REFERENCES BILL(billID)
);

Create table if not exists OUT_OHC (
    billID char(5) primary key,
    rate float not null,
    billID REFERENCES BILL(billID)

);

Create table if not exists PRACTICES_AT (
    dSSN char(9) not null,
    hospitalID char(5) not null,
    fee float not null,
    PRIMARY KEY(dSSN, hospitalID),
    dSSN REFERENCES DOCTOR(dSSN)
);

Create table if not exists ITEMIZED_IN (
    treatmentCode char(5) not null,
    billID char(5) not null,
    PRIMARY KEY (treatmentCode, billID)
);

Create table if not exists DOCTOR_TREATMENT_FEE (
    treatmentCode char(5) not null,
    treatment_fee varchar(10) not null,
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
    PRIMARY KEY pSSN(sTime,day,dSSN)
    aTime REFERENCES SCHEDULE(sTime),
    day REFERENCES SCHEDULE(day),
    dSSN REFERENCES DOCTOR(dSSN),
    pSSN REFERENCES PATIENT(pSSN)
);