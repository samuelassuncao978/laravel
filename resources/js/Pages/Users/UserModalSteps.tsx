import { XIcon } from '@heroicons/react/solid';
import React, { SyntheticEvent } from 'react';
import Field from '../../Components/Form/Field';

export interface CardProps {

}

const UserModalSteps = (props: CardProps): JSX.Element => {
    return (
        <>
            <div className="p-2 flex flex-col md:flex-row bg-white mb-4 rounded">
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#4B84EE" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M34.6666 24.0002C34.6666 29.8912 29.891 34.6668 23.9999 34.6668C18.1089 34.6668 13.3333 29.8912 13.3333 24.0002C13.3333 18.1091 18.1089 13.3335 23.9999 13.3335C29.891 13.3335 34.6666 18.1091 34.6666 24.0002ZM26.5331 20.4026C26.5331 21.8016 25.399 22.9358 23.9999 22.9358C22.6009 22.9358 21.4667 21.8016 21.4667 20.4026C21.4667 19.0035 22.6009 17.8694 23.9999 17.8694C25.399 17.8694 26.5331 19.0035 26.5331 20.4026ZM23.9999 31.7743C26.4909 31.7743 29.58 30.5597 29.58 29.0614C29.58 27.5632 26.4909 25.2788 23.9999 25.2788C21.5089 25.2788 18.4198 27.5632 18.4198 29.0614C18.4198 30.5597 21.5089 31.7743 23.9999 31.7743Z" fill="white" />
                    </svg>
                    <div>
                        <p className="text-xs text-black text-left">Personal Info</p>
                        <p className="text-xs text-grey text-left">Set up your info</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#F2F4F7" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.0054 13.9404V18.9822L24.0054 19.0366V19.0366C24.0053 19.4607 24.0052 19.8728 24.0509 20.2127C24.1024 20.5959 24.2279 21.0332 24.5911 21.3964C24.9544 21.7596 25.3916 21.8852 25.7748 21.9367C26.1148 21.9824 26.5269 21.9823 26.951 21.9822L27.0054 21.9822H32.0475V28.0241C32.0475 30.8694 32.0475 32.2921 31.1636 33.176C30.2797 34.06 28.857 34.06 26.0117 34.06H21.9878C19.1424 34.06 17.7198 34.06 16.8358 33.176C15.9519 32.2921 15.9519 30.8694 15.9519 28.0241V19.9763C15.9519 17.131 15.9519 15.7083 16.8358 14.8244C17.7198 13.9404 19.1424 13.9404 21.9878 13.9404H24.0054ZM26.0054 13.9449V18.9822C26.0054 19.4819 26.0075 19.756 26.0331 19.9462L26.0341 19.9535L26.0413 19.9545C26.2315 19.9801 26.5057 19.9822 27.0054 19.9822H32.043C32.0329 19.5648 32.0003 19.2894 31.8944 19.0337C31.7412 18.664 31.4505 18.3733 30.869 17.7918L30.869 17.7917L28.1962 15.119C27.6147 14.5375 27.3239 14.2467 26.9542 14.0936C26.6985 13.9877 26.423 13.955 26.0054 13.9449Z" fill="#999EA5" />
                    </svg>
                    <div>
                        <p className="text-xs text-black text-left">Qualification documents</p>
                        <p className="text-xs text-grey text-left">Upload documents</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#F2F4F7" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8076 15.8137C13.929 16.6924 13.929 18.1066 13.929 20.9351V27.0649C13.929 29.8934 13.929 31.3076 14.8076 32.1863C15.6863 33.0649 17.1005 33.0649 19.929 33.0649H30.0444C31.0013 33.0649 31.4798 33.0649 31.8716 32.9568C32.8891 32.6759 33.6842 31.8808 33.9651 30.8633C34.0733 30.4714 34.0733 29.993 34.0733 29.0361H28.03C26.3612 29.0361 25.0083 27.6832 25.0083 26.0144C25.0083 24.3456 26.3612 22.9928 28.03 22.9928H34.0733V20.9351C34.0733 18.1066 34.0733 16.6924 33.1946 15.8137C32.3159 14.9351 30.9017 14.9351 28.0733 14.9351H19.929C17.1005 14.9351 15.6863 14.9351 14.8076 15.8137ZM18.9654 18.9712C18.4131 18.9712 17.9654 19.4189 17.9654 19.9712C17.9654 20.5235 18.4131 20.9712 18.9654 20.9712H21.9871C22.5393 20.9712 22.9871 20.5235 22.9871 19.9712C22.9871 19.4189 22.5393 18.9712 21.9871 18.9712H18.9654Z" fill="#999EA5" />
                        <path d="M29.0358 26.0146H28.0286" stroke="#999EA5" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <div>
                        <p className="text-xs text-black text-left">Billing</p>
                        <p className="text-xs text-grey text-left">Set your billing data</p>
                    </div>
                </div>
                <div className="w-1/4 flex flex-row items-center gap-2 py-4 px-6 pr-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="24" fill="#F2F4F7" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0219 16.5841C21.0219 15.9683 20.5227 15.4692 19.907 15.4692C19.2914 15.4692 18.7922 15.9683 18.7922 16.5841V17.9117H17.8227C16.5914 17.9117 15.593 18.91 15.593 20.1414V30.9683C15.593 32.1998 16.5914 33.198 17.8227 33.198H31.0277C32.259 33.198 33.2573 32.1998 33.2573 30.9683V20.1414C33.2573 18.91 32.259 17.9117 31.0277 17.9117H29.909V16.5841C29.909 15.9683 29.4098 15.4692 28.7942 15.4692C28.1785 15.4692 27.6793 15.9683 27.6793 16.5841V17.9117H21.0219V16.5841ZM20.0535 20.9761C19.4394 20.9761 18.9413 21.4739 18.9413 22.0882C18.9413 22.7024 19.4394 23.2003 20.0535 23.2003H28.7974C29.4115 23.2003 29.909 22.7024 29.909 22.0882C29.909 21.4739 29.4115 20.9761 28.7974 20.9761H20.0535Z" fill="#999EA5" />
                    </svg>
                    <div>
                        <p className="text-xs text-black text-left">Availability</p>
                        <p className="text-xs text-grey text-left">Set your work time</p>
                    </div>
                </div>
            </div>
            <div className="w-full flex flex-row px-6 py-2 border-b bg-white rounded-t">
                <div className="font-medium text-gray-600 text-2xl">Profile info</div>
                <button
                    type="button"
                    className="absolute top-3 right-3 text-gray-500   z-30 rounded-full bg-gray-200 p-1 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
                >
                    <XIcon className="h-4 w-4" />
                </button>
            </div>
            <div className="flex flex-col md:flex-row bg-white border-b">
                <div className="w-full md:w-1/3 flex flex-col border-r">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">Personal Data</div>
                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="text" name="user.pre_name" label="Prefered name:" />
                        </div>
                        <div className="flex space-x-4 mt-2">
                            <div className="w-full md:w-1/2">
                                <Field type="text" name="user.first_name" label="First name:" />
                            </div>
                            <div className="w-full md:w-1/2">
                                <Field type="text" name="user.last_name" label="Last name:" />
                            </div>
                        </div>

                        <div className="mt-2">
                            <Field name="user.borth" type="date-of-birth" label="Date Of Birth:" />
                        </div>

                        <div className="mt-2">
                            <Field
                                type="select"
                                name="user.sex"
                                label="Sex:"
                                options={[
                                    ...[
                                        { value: 'man', text: 'Man' },
                                        { value: 'female', text: 'Female' },
                                    ],
                                ]}
                            />
                        </div>

                        <div className="mt-2">
                            <Field
                                type="select"
                                name="user.role"
                                label="Pronouns:"
                                options={[
                                    ...[
                                        { value: 'he', text: 'He/ Him' },
                                        { value: 'she', text: 'She/ Her' },
                                        { value: 'they', text: 'They/ Them' },
                                    ],
                                ]}
                            />
                        </div>
                    </div>
                </div>
                <div className="w-full md:w-1/3 flex flex-col border-r">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">Contact information</div>
                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="text" name="user.email" label="Email:" />
                        </div>

                        <div className="mt-2">
                            <Field type="phone" name="user.phone" label="Phone:" />
                        </div>

                        <div className="mt-2">
                            <Field type="address" name="user.address" label="Address:" />
                        </div>

                        <div className="mt-2">
                            <Field type="timezone" name="timezone" label="Timezone:" size="xs" />
                        </div>
                    </div>
                </div>
                <div className="w-full md:w-1/3 flex flex-col border-r pb-6">
                    <div className="font-medium text-gray-600 text-lg py-4 px-6 pr-4 border-b">About me</div>

                    {/* <div>
                                    <input type="file" accept="image/*" onChange={this.onFileChange} />
                                </div> */}
                    {/* {src && (
                                    <ReactCrop
                                        src={src}
                                        crop={crop}
                                        ruleOfThirds
                                        onImageLoaded={this.onImageLoaded}
                                        onComplete={this.onCropComplete}
                                        onChange={this.onCropChange}
                                    />
                                )}
                                {croppedImageUrl && (
                                    <img alt="Crop" style={{ maxWidth: '100%' }} src={croppedImageUrl} />
                                )} */}
                    <div className='px-6 pr-4'>
                        <div className="mt-3">
                            <Field type="image" name="photo" label="Profile picture" />
                        </div>
                        <div className="mt-3">
                            <Field type="textarea" name="message" label="Bio:" size="xs" />
                        </div>
                        <div className="mt-3">
                            <div className="font-medium text-gray-600 text-sm">Social Media</div>
                            <div className="mt-3">
                                <Field type="text" name="user.facebook" />
                            </div>

                            <div className="mt-3">
                                <Field type="text" name="user.linkdin" />
                            </div>

                            <div className="mt-3">
                                <Field type="text" name="user.twitter" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default UserModalSteps;