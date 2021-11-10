package com.electrodragon.mulm.model.network.validator

import com.electrodragon.mulm.model.network.constant.ElectroResponseState
import com.electrodragon.mulm.model.network.response.CreateProuctData
import com.electrodragon.mulm.model.network.core.ElectroResponse
import com.electrodragon.mulm.model.network.core.BadRequest
import retrofit2.Response

interface CreateProuctValidatorCallbacks {
    fun onResponseUnsuccessful()
    fun onUnderMaintenance()
    fun onBadRequest(badRequest: BadRequest)
//    fun onUnauthorized()
//    fun onDataGotCompromised()
//    fun areThingsWorked(thing: SomeType, thing2: SomeType)
}
class CreateProuctValidator {
    companion object {
        fun validate(
            response: Response<ElectroResponse<CreateProuctData>>,
            callbacks: CreateProuctValidatorCallbacks
        ) {
            when {
                response.isSuccessful -> {
                    response.body()?.let { electroResponse ->
                        when (electroResponse.responseState) {
                            ElectroResponseState.UNDER_MAINTENANCE -> callbacks.onUnderMaintenance()
                            ElectroResponseState.BAD_REQUEST -> {
                                val badRequest = BadRequest()
                                electroResponse.data?.exceptions?.let { exceptions ->
                                    exceptions.missingParam?.let { missingParam ->
                                        badRequest.missingParam = missingParam
                                    }
                                     exceptions.invalidValueOfParam?.let { invalidValueOfParam ->
                                         badRequest.invalidValueOfParam = invalidValueOfParam
                                     }
                                }
                                callbacks.onBadRequest(badRequest)
                            }
//                            ElectroResponseState.UNAUTHORIZED -> {
//                                callbacks.onUnauthorized()
//                            }
//                            ElectroResponseState.COMPROMISED -> {
//                                callbacks.onDataGotCompromised()
//                            }
                            ElectroResponseState.FAILURE -> {
//                                electroResponse.data?.exceptions?.let { exceptions ->
//                                    exceptions.failedToDoSo?.let {
//                                        callbacks.onFailedToDoSo()
//                                    }
//                                }
                            }
                            else -> { // OK
                                electroResponse.data?.let { data ->
//                                    data.areThingsWorked?.let {
//                                        callbacks.areThingsWorked(thing1, thing2)
//                                    }
                                }
                            }
                        }
                    }
                }
                else -> callbacks.onResponseUnsuccessful()
            }
        }
    }
}
