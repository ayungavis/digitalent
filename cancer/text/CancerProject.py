import sklearn as sl 
from sklearn.utils import shuffle
from keras.models import Sequential
from keras.layers import Dense, Activation
from keras.models import Sequential
import pandas as pd 
import numpy as np 
import matplotlib
from matplotlib import pyplot as plt 
from sklearn.preprocessing import StandardScaler
from sklearn.cross_validation import  train_test_split

# apun ka data preprocessing
data = pd.read_csv("dataset.csv",header=0)
data = data.drop("id", 1)
data = data.drop("Unnamed: 32",1)
mapping = {'M' : 0, 'B' : 1}
data['diagnosis'] = data['diagnosis'].map(mapping)
features = list(data.columns[1:31]) # Appending all the columns in feature vector
train_X, test_X, train_Y, test_Y = train_test_split(data[features], data['diagnosis'].values, test_size=0.20, random_state=42)

# apun ka model
model = Sequential()
model.add(Dense(input_dim=30, output_dim=30))
model.add(Dense(input_dim=30, output_dim=30))
model.add(Dense(input_dim=30, output_dim=30))
model.add(Dense(input_dim=30, output_dim=2))
model.add(Activation("sigmoid"))
model.compile(loss='sparse_categorical_crossentropy', optimizer='adam', metrics=['accuracy'])

#fit karke accuracy comes approx 97%
scaler = StandardScaler()
model.fit(scaler.fit_transform(train_X.values), train_Y, epochs=50) 
y_prediction = model.predict_classes(scaler.transform(test_X.values))

print( "\n Accuracy of breast cancer detection system:" , np.sum(y_prediction == test_Y) / float(len(test_Y)))



#server here
import time
import pymysql
while True:
    db = pymysql.connect("localhost","root","","cancer")
    cursor = db.cursor()
    cursor.execute("SELECT * FROM patient_data WHERE diagnosis = ''")
    data = cursor.fetchall()
    for row in data:
        p_id = row[0]
        data = []
        temp = []
        for i in range(1,31):
            temp.append(row[i])
        data.append(temp)
        data = np.array(data)
        y_prediction = model.predict_classes(scaler.transform(data))
        if y_prediction[0] == 1:
            diagnosis = "Benign"
        else:
            diagnosis = "Malignant"
        cursor.execute("UPDATE patient_data SET diagnosis = %s WHERE p_id = %s",(diagnosis, str(p_id)))
        db.commit()
    time.sleep(10)