#include <jni.h>
#include <string>

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_mulm_provider_ElectroLibAccessProvider_getMasterKey(JNIEnv* env, jobject _j) {
    std::string s = "7b227072696d6172794b65794964223a313236353539343630362c226b6579223a5b7b226b657944617461223a7b227479706555726c223a22747970652e676f6f676c65617069732e636f6d2f676f6f676c652e63727970746f2e74696e6b2e41657347636d4b6579222c2276616c7565223a224769426b504b414c5656484532316d33355832504365622f36714d483573577065456c7455505638566e684545513d3d222c226b65794d6174657269616c54797065223a2253594d4d4554524943227d2c22737461747573223a22454e41424c4544222c226b65794964223a313236353539343630362c226f757470757450726566697854797065223a2254494e4b227d5d7d";
    return env->NewStringUTF(s.c_str());
}

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_mulm_provider_ElectroLibAccessProvider_getSecretKey(JNIEnv* env, jobject _j) {
    std::string s = "QCT1YZL85PSWB8VD3ADNAH5LQZK217RYOJYLBWMD1RBOMXAZXF26AOWONYB7YFLM7DSR1A";
    return env->NewStringUTF(s.c_str());
}

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_mulm_provider_ElectroLibAccessProvider_getServerBaseUrl(JNIEnv* env, jobject _j) {
    std::string s = "https://api.mulm.com/";
    return env->NewStringUTF(s.c_str());
}

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_mulm_provider_ElectroLibAccessProvider_getServerApiKey(JNIEnv* env, jobject _j) {
    std::string s = "hi,-its-eevee. I can do wonderful things in api creation.";
    return env->NewStringUTF(s.c_str());
}
