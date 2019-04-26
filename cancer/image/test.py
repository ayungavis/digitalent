#!C:/Anaconda/python.exe
# -*- coding: utf-8 -*-
"""
Created on Tue Sep 12 23:18:52 2017

@author: Dell
"""
import numpy as np
from keras.models import Sequential
from keras.layers import Activation, Dropout, Flatten, Dense
from keras.preprocessing.image import ImageDataGenerator
from keras.layers import Convolution2D, MaxPooling2D, ZeroPadding2D
from keras import optimizers

training_data= 'training_set'
validation_data ='test_set'
img_width, img_height = 256, 256
n_filters = 64
# used to rescale the pixel values from [0, 255] to [0, 1] interval
datagen = ImageDataGenerator(rescale=1./255)

# automagically retrieve images and their classes for train and validation sets
train_generator = datagen.flow_from_directory(
        training_data,
        target_size=(img_width, img_height),
        batch_size=16,
        class_mode='categorical')

validation_generator = datagen.flow_from_directory(
        validation_data,
        target_size=(img_width, img_height),
        batch_size=16,
        class_mode='categorical')



model = Sequential()
model.add(Convolution2D(n_filters, 3, 3, input_shape=(img_width, img_height,3)))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))

model.add(Convolution2D(n_filters, 3, 3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))

model.add(Convolution2D(n_filters, 3, 3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))

model.add(Convolution2D(n_filters, 3, 3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))

model.add(Flatten())
model.add(Dense(128))
model.add(Activation('relu'))
model.add(Dropout(0.5))
model.add(Dense(128))
model.add(Activation('relu'))
model.add(Dropout(0.5))
model.add(Dense(8))
model.add(Activation('softmax'))


model.compile(loss='binary_crossentropy',
              optimizer='rmsprop',
              metrics=['accuracy'])


nb_epoch = 40
nb_train_samples = 777
nb_validation_samples = 214
#model.fit_generator(
#        train_generator,
#        samples_per_epoch=nb_train_samples,
#        nb_epoch=nb_epoch,
#        validation_data=validation_generator,
#        nb_val_samples=nb_validation_samples,
#        workers=4)

#model.save_weights('models/temp80_new_model.h5')

model.load_weights('models/temp80_new_model.h5')





#test_image = test_image / 255.





#db and server
import pymysql
import shutil
import os
import time
from keras.preprocessing import image
dictionary = train_generator.class_indices


while True:
    db = pymysql.connect("localhost","root","","cancer")
    cursor = db.cursor()
    cursor.execute("SELECT user_id, filename, image_id FROM image_data WHERE diagnosis = ''")
    data = cursor.fetchall()
    for row in data:
        user_id = row[0]
        filename = row[1]
        image_id = row[2]
        print(user_id)
        src = "../../user_images/" + filename
        des = "predictions/" + str(image_id) + "/" + filename
        os.mkdir("predictions/" + str(image_id))
        shutil.copy(src, des)
        
        test_image = image.load_img('predictions/' + str(image_id) + '/' + filename,target_size=(256, 256))
        test_image = image.img_to_array(test_image)
        test_image = np.expand_dims(test_image,axis=0)
        test_image = test_image / 255.
        result  = model.predict(test_image)
        index = result.argmax()
        for key, value in dictionary.items():
            if value == index:
                cursor.execute("UPDATE image_data SET diagnosis = %s,confidence_score = %s WHERE image_id = %s",(key,str(result[0][index]),image_id))
                break
        shutil.rmtree('predictions/' + str(image_id))
        db.commit()
    time.sleep(10)
        