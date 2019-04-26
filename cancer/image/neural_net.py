# -*- coding: utf-8 -*-
"""
Created on Tue Sep 12 23:18:52 2017

@author: Dell
"""
import os
import numpy as np
from keras.models import Sequential
from keras.layers import Activation, Dropout, Flatten, Dense
from keras.preprocessing.image import ImageDataGenerator
from keras.layers import Convolution2D, MaxPooling2D, ZeroPadding2D
from keras import optimizers

training_data= 'training_set'
validation_data ='test_set'
img_width, img_height = 500, 400

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
model.add(Convolution2D(32, 3, 3, input_shape=(img_width, img_height,3)))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))

model.add(Convolution2D(32, 3, 3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))

model.add(Convolution2D(32, 3, 3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))

model.add(Flatten())
model.add(Dense(64))
model.add(Activation('relu'))
model.add(Dropout(0.5))
model.add(Dense(8))
model.add(Activation('softmax'))


model.compile(loss='binary_crossentropy',
              optimizer='rmsprop',
              metrics=['accuracy'])


nb_epoch = 20
nb_train_samples = 1459
nb_validation_samples = 361
model.fit_generator(
        train_generator,
        samples_per_epoch=nb_train_samples,
        nb_epoch=nb_epoch,
        validation_data=validation_generator,
        nb_val_samples=nb_validation_samples,
        workers=8)

model.save_weights('models/CNN30.h5')

model.load_weights('models/CNN30.h5')


from keras.preprocessing import image
test_image = image.load_img('predictions/SOB_B_PT-14-29315EF-400-013.png',target_size=(500,400))
test_image = image.img_to_array(test_image)
test_image = np.expand_dims(test_image,axis=0)
result  = model.predict(test_image)
train_generator.class_indices