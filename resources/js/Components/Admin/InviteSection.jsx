import { useForm } from "@inertiajs/react";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import PrimaryButton from "@/Components/PrimaryButton";

export default function InviteSection() {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
    });

    const submit = (e) => {
        e.preventDefault();

        post(route("admin.invite"));
    };

    return (
        <section className="p-6">
            <form onSubmit={submit}>
                <h1 className="text-lg font-semibold text-gray-900">
                    Invite a Driver
                </h1>
                <div className="mt-4">
                    <InputLabel htmlFor="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        onChange={(e) => setData("email", e.target.value)}
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>
                <div className="flex justify-end">
                    <PrimaryButton className="mt-2" disabled={processing}>
                        Send Invite
                    </PrimaryButton>
                </div>
            </form>
        </section>
    );
}
