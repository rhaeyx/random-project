import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import InviteSection from "@/Components/Admin/InviteSection";
import { Head } from "@inertiajs/react";

export default function Dashboard({ auth, status }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Admin Dashboard
                </h2>
            }
            status={status}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <InviteSection className="p-6" content="hal" />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
